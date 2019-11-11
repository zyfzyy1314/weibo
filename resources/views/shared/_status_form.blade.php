<form action="{{Route('statues.store')}}" method="POST">
        @include('shared._error_message')
        {{ csrf_field() }}
        <textarea class="form-control" rows="3" placeholder="聊聊新鲜事儿..." name="content">{{ old('content') }}</textarea>
        <div class="text-right">
            <button type="submit" class="btn btn-primary mt-3">发布</button>
        </div>
</form>