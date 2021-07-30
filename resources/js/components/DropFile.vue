<template>
    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
</template>

<script>
    import vueDropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    export default {
        components: {vueDropzone},
        data() {
            return {
                dropzoneOptions: {
                    // url: 'https://httpbin.org/post',
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    headers: { "My-Awesome-Header": "header value" }
                }
            }
        }
    }
</script>

<style>

</style>
<!-- <template>
    <div class="card-body">
        <p class="card-subtitle font-weight-bold mb-1">Additional project files</p>

        <ul class="list-group list-unstyled mb-1">
            <li v-for="file in files" class="list-item" :key="file.name">
                <i class="fas fa-paperclip"></i>
                {{file.name + ' (' + file.getSize() + ' KB' + ')' }}
                <span class="btn-link p-2 deleteFile" @click="deleteFile(files.indexOf(file))">
                    <i class="fas fa-trash"></i>
                </span>

                <span v-if="file.display">{{file.progress}}%</span>
            </li>
        </ul>
        <div class="form-group">
            <input type="file" class="custom-file-input" id="customFile" style="display:none;" ref="file" @change="readAndStore($event.target.files[0])">

            <div :class="[fileUploadError ? invalidDrop : validDrop]" class="card p-4 rounded-0 d-flex justify-content-center align-items-center" @dragover.prevent @drop.prevent="drop">
                <p class="m-0">drag or <span class="text-primary btn-link customDropLink" @click="$refs.file.click(drop)">upload</span> project images or files</p>
            </div>

            <p :class="[fileUploadError ? textDanger : textMuted]" class="card-subtitle mb-1 mt-1">You may attach up to 3 jpg, png or pdf under 100 MB each</p>
        </div>
    </div>
</template>

<script>
    class UploadFile {
        constructor(file) {
            this.name = file.name;
            this.display = file.display;
            this.progress = file.progress;
            this.size = file.size;
            this.file = file;
        };

        processAndSaveToStorage(storage) {
                let result = '';
                let reader = new FileReader();
                let vm = this;
                reader.onloadstart = () => {
                    this.display = true;
                };

                reader.onprogress = function(event) {
                    let percent = (event.loaded / event.total) * 100;
                    vm.progress = Math.round(percent);
                };
                reader.onloadend = () => {
                    this.file = reader.result;
                    storage.push(this.file);
                    this.display = false;
                };
                reader.readAsDataURL(this.file);
        };

        getSize() {
            let kb = this.size / 1000;
            return Math.floor(kb);
        }
    }
    export default {
        data() {
            return {
                // file upload
                files: [],
                fileCount: 0,
                fileCountCounter: 0,
                fileUploadError: false,
                processedFiles: [],

                // class
                validDrop: 'drop-card',
                invalidDrop: 'drop-card-error',
                textMuted: 'text-muted',
                textDanger: 'text-danger',
            }
        },

        methods: {
            drop(e) {
                // this.fileCountCounter = e.dataTransfer.items.length;
                let collections = [];
                for (var i = 0; i < e.dataTransfer.items.length; i++) {
                    if (e.dataTransfer.items[i].kind === 'file' && this.fileCount <= 3) {
                        this.fileUploadError = false;
                        let file = e.dataTransfer.items[i].getAsFile();
                        file.display = false;
                        file.progress = 0;
                        collections.push(file);
                        // this.readAndStore(file);
                    } else {
                        this.fileUploadError = true;
                    }
                };
                this.readAndStore(collections);
            },

            readAndStore(file) {
                // console.log(typeof(file));
                file.forEach(f => {console.log(f);})
                // console.log(file.length);
                // this.fileCount++;
                // if (this.fileCount <= 3) {
                //     let loadedFile = new UploadFile(file);

                //     this.files.push(loadedFile);

                //     loadedFile.processAndSaveToStorage(this.processedFiles); // passing storage
                // } else {
                //     this.fileCount--;
                //     this.fileUploadError = true;
                // }
            },

            deleteFile(e){
                this.files.splice(e, 1);
                this.processedFiles.splice(e, 1);
                // this.form.files.splice(e, 1);
                this.fileCount--;
                this.fileUploadError = false;
            },
        }
    }
</script>

<style>
 .drop-card {
        border: 2px dashed #15be61;
    }
    .drop-card-error {
        border: 2px dashed red;
    }

    .customDropLink { cursor: pointer; }
</style>
 -->
