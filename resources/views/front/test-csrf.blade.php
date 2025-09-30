@extends('front.includes.container')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>CSRF Token & Document Verification Test</h4>
                </div>
                <div class="card-body">
                    <!-- CSRF Token Test Section -->
                    <div class="mb-4">
                        <h5>CSRF Token Test</h5>
                        <p>Current CSRF Token: <code id="currentToken">{{ csrf_token() }}</code></p>
                        <button id="refreshTokenBtn" class="btn btn-primary">Refresh CSRF Token</button>
                        <button id="testAjaxBtn" class="btn btn-success">Test AJAX Request</button>
                        <div id="tokenResult" class="mt-2"></div>
                    </div>

                    <!-- Document Verification Test Section -->
                    <div class="mb-4">
                        <h5>Document Verification Test</h5>
                        <div class="form-group">
                            <label for="productIdInput">Product ID:</label>
                            <input type="number" id="productIdInput" class="form-control" placeholder="Enter Product ID" value="1">
                        </div>
                        <button id="verifyDocBtn" class="btn btn-info">Verify Document</button>
                        <div id="docResult" class="mt-2"></div>
                    </div>

                    <!-- Recent Products Section -->
                    <div class="mb-4">
                        <h5>Recent Products with Documents</h5>
                        <button id="loadRecentBtn" class="btn btn-secondary">Load Recent Products</button>
                        <div id="recentProducts" class="mt-2"></div>
                    </div>

                    <!-- Error Test Section -->
                    <div class="mb-4">
                        <h5>Error Handling Test</h5>
                        <button id="testErrorBtn" class="btn btn-warning">Test Error Handling</button>
                        <div id="errorResult" class="mt-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Test CSRF token refresh
    $('#refreshTokenBtn').on('click', function() {
        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Refreshing...');

        window.refreshCSRFToken().done(function(data) {
            if (data.token) {
                $('#currentToken').text(data.token);
                $('#tokenResult').html('<div class="alert alert-success">CSRF token refreshed successfully!</div>');
            } else {
                $('#tokenResult').html('<div class="alert alert-danger">Failed to refresh CSRF token</div>');
            }
        }).fail(function(xhr) {
            $('#tokenResult').html('<div class="alert alert-danger">Error refreshing CSRF token: ' + xhr.statusText + '</div>');
        }).always(function() {
            $btn.prop('disabled', false).text(originalText);
        });
    });

    // Test AJAX request with CSRF token
    $('#testAjaxBtn').on('click', function() {
        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Testing...');

        $.ajax({
            url: '{{ route("refresh-csrf") }}',
            method: 'GET',
            success: function(data) {
                $('#tokenResult').html('<div class="alert alert-success">AJAX request successful! Response: ' + JSON.stringify(data) + '</div>');
            },
            error: function(xhr) {
                $('#tokenResult').html('<div class="alert alert-danger">AJAX request failed: ' + xhr.statusText + '</div>');
            },
            complete: function() {
                $btn.prop('disabled', false).text(originalText);
            }
        });
    });

    // Test document verification
    $('#verifyDocBtn').on('click', function() {
        const productId = $('#productIdInput').val();
        if (!productId) {
            $('#docResult').html('<div class="alert alert-warning">Please enter a product ID</div>');
            return;
        }

        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Verifying...');

        window.checkRecentDocuments(productId).done(function(response) {
            if (response && response.file_exists) {
                $('#docResult').html(`
                    <div class="alert alert-success">
                        <strong>Document Verified!</strong><br>
                        File exists: ${response.file_exists}<br>
                        Last modified: ${response.last_modified}<br>
                        File size: ${response.file_size} bytes<br>
                        File path: ${response.file_path}
                    </div>
                `);
            } else {
                $('#docResult').html('<div class="alert alert-warning">Document not found or verification failed</div>');
            }
        }).fail(function(xhr) {
            $('#docResult').html('<div class="alert alert-danger">Error verifying document: ' + xhr.statusText + '</div>');
        }).always(function() {
            $btn.prop('disabled', false).text(originalText);
        });
    });

    // Load recent products
    $('#loadRecentBtn').on('click', function() {
        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Loading...');

        $.ajax({
            url: '{{ route("admin-product-datatables") }}',
            method: 'POST',
            data: {
                start: 0,
                length: 10,
                columns: [
                    {search: {value: ''}},
                    {search: {value: ''}},
                    {search: {value: ''}},
                    {search: {value: ''}},
                    {search: {value: ''}},
                    {search: {value: ''}},
                    {search: {value: ''}},
                    {search: {value: ''}}
                ],
                order: [{column: 0, dir: 'desc'}]
            },
            success: function(response) {
                let html = '<div class="table-responsive"><table class="table table-striped"><thead><tr><th>ID</th><th>Title</th><th>Status</th><th>Document</th><th>Created</th></tr></thead><tbody>';

                if (response.data && response.data.length > 0) {
                    response.data.forEach(function(product) {
                        const hasDocument = product.document ? 'Yes' : 'No';
                        const createdDate = new Date(product.created_at).toLocaleDateString();
                        html += `<tr>
                            <td>${product.id}</td>
                            <td>${product.product_title || 'N/A'}</td>
                            <td>${product.status == 1 ? 'Active' : 'Inactive'}</td>
                            <td>${hasDocument}</td>
                            <td>${createdDate}</td>
                        </tr>`;
                    });
                } else {
                    html += '<tr><td colspan="5" class="text-center">No products found</td></tr>';
                }

                html += '</tbody></table></div>';
                $('#recentProducts').html(html);
            },
            error: function(xhr) {
                $('#recentProducts').html('<div class="alert alert-danger">Error loading products: ' + xhr.statusText + '</div>');
            },
            complete: function() {
                $btn.prop('disabled', false).text(originalText);
            }
        });
    });

    // Test error handling
    $('#testErrorBtn').on('click', function() {
        const $btn = $(this);
        const originalText = $btn.text();

        $btn.prop('disabled', true).text('Testing...');

        // Make a request to a non-existent endpoint to test error handling
        $.ajax({
            url: '/non-existent-endpoint',
            method: 'POST',
            data: {test: 'data'},
            success: function(data) {
                $('#errorResult').html('<div class="alert alert-success">Unexpected success</div>');
            },
            error: function(xhr) {
                let errorMessage = 'Error occurred: ' + xhr.statusText;
                if (xhr.status === 419) {
                    errorMessage += ' (CSRF Token Mismatch)';
                } else if (xhr.status === 404) {
                    errorMessage += ' (Not Found)';
                }
                $('#errorResult').html('<div class="alert alert-warning">' + errorMessage + '</div>');
            },
            complete: function() {
                $btn.prop('disabled', false).text(originalText);
            }
        });
    });
});
</script>
@endsection
