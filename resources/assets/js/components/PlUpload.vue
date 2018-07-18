<template xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div id="plupload_component">
        <button v-if="isSuccess" v-on:click="clearUploaded" type="button" class="btn btn-danger pull-right"><i class="fa fa-trash"></i></button>
        <figure class="figure thumbnail-placeholder">
            <span v-if="isInitial">
                <i class="fa fa-picture-o"></i>
                <button type="button" :id="uploadFieldName+'_pickfiles'" class="btn btn-primary btn-block">{{ buttonText }}</button>
            </span>
            <img :id="uploadFieldName+'_preview'" v-bind:src="getImage" alt="" class="figure-img img-fluid" v-if="isSuccess" />
        </figure>
        <input type="hidden" :name="uploadFieldName" v-model="fileUpload" />
    </div>
</template>

<style lang="scss">

</style>

<script>

    import plupload from 'plupload/js/plupload.full.min';
    import mOxie from 'plupload/js/moxie.min';

    let uploader = '';

    const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;

    export default {
        //name: 'v-image-upload',
        props: ['uploadFieldName', 'buttonText', 'uploaded'],
        data() {
            return {
                uploadedFiles: [],
                fileUpload: '',
                filePreview: '',
                uploadError: null,
                currentStatus: null
            }
        },
        created() {
            console.log('Component ready.');

            if ( this.uploaded ) {
                this.fileUpload = this.uploaded;
                this.filePreview = this.uploaded;

                this.currentStatus = STATUS_SUCCESS;
            }

            console.log( this.fileUpload );
        },
        computed: {
            isInitial() {
                return this.currentStatus === STATUS_INITIAL || this.currentStatus === null;
            },
            isSaving() {
                return this.currentStatus === STATUS_SAVING;
            },
            isSuccess() {
                return this.currentStatus === STATUS_SUCCESS;
            },
            isFailed() {
                return this.currentStatus === STATUS_FAILED;
            },
            getImage() {
                console.log( this.filePreview );
                return this.filePreview;
            },
            getFileName() {
                return this.fileUpload;
            }
        },
        methods: {
            filesAdded(up, files) {
                //this.uploadedFiles = [].concat(files);

                up.start();
            },
            fileUploaded: function(up, files, result) {
                let response = JSON.parse(result.response);

                this.filePreview = response.result.url;
                this.fileUpload = response.result.filename;

                this.currentStatus = STATUS_SUCCESS;
            },
            uploadComplete: function(up, files) {
                //console.log(up, files);
            },
            clearUploaded: function() {
                this.fileUpload = '';
                this.filePreview = '';

                this.currentStatus = STATUS_INITIAL;

                console.log( this.fileUpload, this.filePreview, this.currentStatus );

            }
        },
        mounted() {
            uploader = new plupload.Uploader({
                browse_button: this.uploadFieldName+'_pickfiles',
                url: '/admin/utils/media/upload',
                runtimes: 'html5',
                drop_element: 'plupload_component',
                multi_selection: false,
                unique_names: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                views: {
                    list: true,
                    thumbs: true,
                    active: 'thumbs'
                }
            });

            uploader.init();

            uploader.bind('Init', function() {
                this.currentStatus = STATUS_SAVING;
            });

            uploader.bind('FilesAdded', this.filesAdded);
            uploader.bind('FileUploaded', this.fileUploaded);
            uploader.bind('UploadComplete', this.uploadComplete);
        },
    }

    /*
    //import { upload } from './services/image-upload.service';
    import { upload } from './services/image-upload.fake.service';

    const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;

    export default {
        //name: 'v-image-upload',
        data() {
            return {
                uploadedFiles: [],
                uploadError: null,
                currentStatus: null,
                uploadFieldName: 'photos'
            }
        },
        computed: {
            isInitial() {
                return this.currentStatus === STATUS_INITIAL;
            },
            isSaving() {
                return this.currentStatus === STATUS_SAVING;
            },
            isSuccess() {
                return this.currentStatus === STATUS_SUCCESS;
            },
            isFailed() {
                return this.currentStatus === STATUS_FAILED;
            }
        },
        methods: {
            reset() {
                // reset form to initial state
                this.currentStatus = STATUS_INITIAL;
                this.uploadedFiles = [];
                this.uploadError = null;
            },
            save(formData) {
                // upload data to the server
                this.currentStatus = STATUS_SAVING;

                upload(formData)
                .then(x => {
                    this.uploadedFiles = [].concat(x);
                    this.currentStatus = STATUS_SUCCESS;
                })
                .catch(err => {
                    this.uploadError = err.response;
                    this.currentStatus = STATUS_FAILED;
                });
            },
            filesChange(fieldName, fileList) {
                // handle file changes
                const formData = new FormData();

                if (!fileList.length) return;

                // append the files to FormData
                Array
                .from(Array(fileList.length).keys())
                .map(x => {
                    formData.append(fieldName, fileList[x], fileList[x].name);
                });

                // save it
                this.save(formData);
            }
        },
        mounted() {
            this.reset();
        },
    }
    */

</script>
