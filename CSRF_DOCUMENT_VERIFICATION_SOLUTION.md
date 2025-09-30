# CSRF Token Mismatch & Document Verification Solution

## Overview
This solution addresses two main issues:
1. **CSRF Token Mismatch**: Prevents and handles CSRF token expiration errors
2. **Document Verification**: Allows checking if recently uploaded documents are available in the frontend

## Files Modified

### 1. Frontend Container (`resources/views/front/includes/container.blade.php`)
**Changes Made:**
- Added global CSRF token setup for all AJAX requests
- Implemented automatic CSRF token refresh every 30 minutes
- Added global error handler for CSRF token mismatch (419 errors)
- Created `window.refreshCSRFToken()` function
- Created `window.checkRecentDocuments()` function

**Key Features:**
```javascript
// Automatic CSRF token setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Global error handler for CSRF mismatch
$(document).ajaxError(function(event, xhr, settings) {
    if (xhr.status === 419) {
        // Handle CSRF token mismatch
        window.location.reload();
    }
});
```

### 2. Product Page (`resources/views/front/product.blade.php`)
**Changes Made:**
- Added "Verify Document" button to product details
- Implemented document verification functionality
- Added visual feedback for verification status

**New Features:**
- Document verification button with loading states
- Success/error feedback with color-coded buttons
- Automatic button reset after verification

### 3. Routes (`routes/web.php`)
**New Routes Added:**
```php
// CSRF token refresh
Route::get('/refresh-csrf', function() {
    return response()->json(['token' => csrf_token()]);
})->name('refresh-csrf');

// Document verification
Route::get('/product/{product}/verify-file', 'Admin\ProductController@verifyFileUpdate')
    ->name('product.verify-file');

// Test page
Route::get('/test-csrf', function() {
    return view('front.test-csrf');
})->name('test-csrf');
```

### 4. Exception Handler (`app/Exceptions/Handler.php`)
**Changes Made:**
- Uncommented and improved CSRF token mismatch handling
- Added proper JSON response for AJAX requests
- Enhanced error messages for better user experience

### 5. Test Page (`resources/views/front/test-csrf.blade.php`)
**New File Created:**
- Comprehensive testing interface for CSRF and document verification
- Interactive buttons to test all functionality
- Real-time feedback and error handling demonstration

## How It Works

### CSRF Token Management
1. **Automatic Setup**: All AJAX requests automatically include CSRF token
2. **Auto-Refresh**: Token refreshes every 30 minutes to prevent expiration
3. **Error Handling**: 419 errors trigger automatic page refresh
4. **Manual Refresh**: `window.refreshCSRFToken()` function available

### Document Verification
1. **Button Click**: User clicks "Verify Document" button
2. **AJAX Request**: Calls `/product/{id}/verify-file` endpoint
3. **File Check**: Server checks if document exists and gets metadata
4. **Response**: Returns file existence, size, and last modified date
5. **UI Feedback**: Button changes color and shows status

### Error Handling
1. **CSRF Mismatch**: Automatic page refresh with user notification
2. **Document Not Found**: Clear error message with support contact
3. **Network Errors**: Retry mechanism with user feedback
4. **Validation Errors**: Form-specific error handling

## Usage Instructions

### For Developers
1. **Test the Solution**: Visit `/test-csrf` to test all functionality
2. **Monitor Logs**: Check browser console for CSRF token refresh logs
3. **Verify Documents**: Use the verify button on product pages

### For Users
1. **Document Verification**: Click "Verify Document" button on product pages
2. **Error Recovery**: If you see "Session expired" message, the page will auto-refresh
3. **Status Indicators**: 
   - Blue: Ready to verify
   - Green: Document verified successfully
   - Red: Document not found
   - Yellow: Error occurred

## API Endpoints

### CSRF Token Refresh
```
GET /refresh-csrf
Response: {"token": "new_csrf_token"}
```

### Document Verification
```
GET /product/{id}/verify-file
Response: {
    "file_exists": true,
    "last_modified": "2024-01-15 10:30:00",
    "file_size": 1024000,
    "file_path": "documents/filename.pdf"
}
```

## Configuration

### CSRF Token Refresh Interval
```javascript
// In container.blade.php, line 195
setInterval(function() {
    window.refreshCSRFToken();
}, 30 * 60 * 1000); // 30 minutes
```

### Error Handling Timeout
```javascript
// In product.blade.php, line 1152
setTimeout(function() {
    $btn.prop('disabled', false).removeClass('btn-success').addClass('btn-info').html(originalText);
}, 3000); // 3 seconds
```

## Troubleshooting

### Common Issues
1. **CSRF Token Still Expiring**: Check if routes are properly configured
2. **Document Verification Failing**: Ensure product has a document uploaded
3. **AJAX Errors**: Check browser console for detailed error messages

### Debug Mode
Enable debug mode in `.env`:
```
APP_DEBUG=true
```

### Logs
Check Laravel logs in `storage/logs/laravel.log` for server-side errors.

## Security Considerations

1. **CSRF Protection**: All forms and AJAX requests are protected
2. **Token Rotation**: Tokens refresh automatically to prevent replay attacks
3. **Error Handling**: Sensitive information is not exposed in error messages
4. **File Verification**: Only checks file existence, not content validation

## Future Enhancements

1. **Real-time Updates**: WebSocket integration for live document status
2. **Batch Verification**: Verify multiple documents at once
3. **Document History**: Track document upload/update history
4. **Advanced Error Recovery**: More sophisticated error handling strategies

## Testing

### Manual Testing
1. Visit `/test-csrf` page
2. Test CSRF token refresh functionality
3. Test document verification with different product IDs
4. Test error handling with invalid requests

### Automated Testing
```bash
# Run Laravel tests
php artisan test

# Test specific functionality
php artisan test --filter=CsrfTest
```

## Support

For issues or questions:
1. Check browser console for JavaScript errors
2. Review Laravel logs for server errors
3. Use the test page to isolate issues
4. Contact development team with specific error messages

