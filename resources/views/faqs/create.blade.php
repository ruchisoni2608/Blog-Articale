<!-- resources/views/faqs/create.blade.php -->

<form id="createEditFaqForm"
    action="{{ $action == 'create' ? route('faqs.store') : route('faqs.update', ['id' => $faq->id]) }}" method="POST">
    @csrf
    @if ($action == 'edit')
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="FAQ title"
            value="{{ $action == 'edit' ? $item->title : '' }}">
    </div>
    <div class="form-group">
        <label for="answer">Content</label>
        <textarea id="editor1" name="answer" cols="56" rows="5">{{ $action == 'edit' ? $item->answer : '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-select" id="exampleFormControlSelect3" name="category">
            <option value="" disabled selected>Select</option>
            @foreach ($faqcategories as $category)
                <option value="{{ $category->category }}"
                    {{ $action == 'edit' && $item->category == $category->category ? 'selected' : '' }}>
                    {{ $category->category }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            {{ $action === 'create' ? 'Create FAQ' : 'Update FAQ' }}
        </button>
    </div>
</form>





{{-- <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('faqs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category">Title</label>

                        <input type="text" name="title" class="form-control" placeholder="FAQ title">

                    </div>
                    <div class="form-group">

                        <label for="answer">Content</label>

                        <textarea id="editor1" name="answer" cols="56" rows="5"></textarea>
                    </div>
                    <div class="form-group">

                        <label for="category">Category</label>

                        <div class="custom-select">

                            <select class="form-select" id="exampleFormControlSelect3" name="category">
                                <option value="" disabled selected>Select</option>
                                @foreach ($faqcategories as $category)
                                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>


        </div>
    </div>
</div> --}}



@section('scripts')
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('editor1', {
                on: {
                    change: function() {
                        updateTextarea();
                    }
                }
            });
        });
        // Function to update the original textarea with CKEditor content
        function updateTextarea() {
            console.log("Updating textarea...");
            var editor = CKEDITOR.instances.editor1;
            console.log("Editor instance:", editor);
            if (editor) {
                var content = editor.getData();
                // Set the content in the original textarea
                document.getElementById('editor1').value = content;
                console.log('Content in textarea:', content);
            }
        }
    </script>
@endsection
