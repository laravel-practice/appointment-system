<div class="btn-group">
    <button type="button"  class="btn-sm btn btn-success showData common_btn" data-id="{{$record->id}}">
        View
    </button>

    <form method="POST"
          action="{{route('admin.user.delete',$record->id)}}"
          accept-charset="UTF-8"
          class="form-inline"
          style="display: inline-block">
        <input name="_method" type="hidden" value="DELETE">
        {{csrf_field()}}
        <button class="btn btn-danger btn-xs btn-delete-record common_btn"
                type="button">
            Del
        </button>
    </form>

    <a href="{{ route('admin.user.edit',$record->id) }}"  class="btn-sm btn btn-primary common_btn common_tag">
        Edit
    </a>
</div>

