<?php include 'view/master.php'; ?>

<div class="bg-gray-100 p-8 w-full h-screen">
    <div class="bg-white p-6 shadow rounded w-full">
        <form action="<?= urlpath('admin/artikel/add'); ?>" method="post" enctype="multipart/form-data"
            class="space-y-4">
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" id="judul" name="judul" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                <input type="file" id="gambar" name="gambar" accept=".png, .jpg, .jpeg, .webp"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                <div id="editor"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    style="min-height: 150px; height: 380px; width: 100%;"></div>
                <!-- Hidden textarea to store the content -->
                <textarea name="konten" style="display:none;" id="hiddenArea"></textarea>
            </div>
            <input type="submit" value="Tambah" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
        </form>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    ['blockquote', 'code-block'],
                    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
                    [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
                    [{ 'direction': 'rtl' }],                         // text direction
                    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean'],                                        // remove formatting button
                    ['link', 'image', 'video']                        // link and image, video
                ]
            }
        });

        // Enable Image Upload
        function selectLocalImage() {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.click();

            input.onchange = () => {
                const file = input.files[0];

                // File Reader to read file
                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    const id = `blobid${(new Date()).getTime()}`;
                    const blobCache = quill.editor.getModule('toolbar').add('image', reader.result);
                    quill.insertEmbed(quill.getSelection().index, 'image', reader.result);
                }, false);
                if (file) {
                    reader.readAsDataURL(file);
                }
            };
        }

        quill.getModule('toolbar').addHandler('image', () => {
            selectLocalImage();
        });

        var form = document.querySelector('form');
        form.onsubmit = function () {
            // Populate hidden form on submit
            var konten = document.querySelector('textarea[name=konten]');
            konten.value = quill.root.innerHTML;
        };
    </script>
</div>