<a href="{{ route('admin-plans-edit', $plan->id) }}" class="btn btn-sm btn-primary" title="Edit">
    <i class="fas fa-edit"></i>
</a>
<form action="{{ route('admin-plans-destroy', $plan->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
            onclick="return confirm('Are you sure you want to delete this plan?')">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
