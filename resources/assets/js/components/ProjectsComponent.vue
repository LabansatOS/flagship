<template>
    <div class="create">
        <label for="post-title" class="create__label">Titulo:</label>
        <input v-model="title" type="text" name="title" id="post-title" class="create__input" required>

        <label class="create__label">Imagen:</label>
        <image-upload url="/api/project/image" @image-uploaded="(url) => { image = url}"></image-upload>

        <label for="post-video" class="create__label">Video:</label>
        <input v-model="video" type="text" name="video" id="post-video" class="create__input" required>
        
        <label for="post-location" class="create__label">Ubicación:</label>
        <input v-model="location" type="text" name="location" id="post-location" class="create__input" required>
        
        <label for="post-total" class="create__label">Total actual:</label>
        <input v-model="total" type="text" name="total" id="post-total" class="create__input" required>
        
        <label for="post-objective" class="create__label">Objetivo:</label>
        <input v-model="objective" type="text" name="objective" id="post-objective" class="create__input" required>
        
        <label for="post-backers" class="create__label">Promotores:</label>
        <input v-model="backers" type="text" name="objective" id="post-backers" class="create__input" required>
        
        <label for="post-summary" class="create__label">Resumen*:</label>
        <textarea v-model="summary" type="text" name="abstract" id="post-summary" maxlength="200" class="create__input" style="height: 100px;" required></textarea>
        
        <div id="trumbowyg">
        </div>
        <div v-on:click="submit" style="display: flex; justify-content: center; cursor:pointer;" class="admin-form__button">Crear post</div>
    </div>
</template>


<script>
    export default {
        data () {
            return {
                title: '',
                image: '',
                video: '',
                summary: '',
                location: '',
                total: '',
                objective: '',
                backers: '',
                html: '',
            }
        },

        methods: {
            submit: function() {
                this.html = $('#trumbowyg').trumbowyg('html');
                self = this;
                axios.post('/api/projects', {
                    content: this.html,
                    title: this.title,
                    image: this.image,
                    video: this.video,
                    summary: this.summary,
                    location: this.location,
                    total: this.total,
                    objective: this.objective,
                    backers: this.backers,
                   
                })
                .then(function (response) {
                    self.$router.push({ path: '/' });
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            loadTrumb: function() {
                !function(r){"use strict";function e(r,a){var o=a.shift(),l=a;if(null!==r){if(0===l.length)return r[o];if("object"==typeof r)return e(r[o],l)}return r}function a(){if(!r.trumbowyg.addedXhrProgressEvent){var e=r.ajaxSettings.xhr;r.ajaxSetup({xhr:function(){var r=e(),a=this;return r&&"object"==typeof r.upload&&void 0!==a.progressUpload&&r.upload.addEventListener("progress",function(r){a.progressUpload(r)},!1),r}}),r.trumbowyg.addedXhrProgressEvent=!0}}var o={serverPath:"",fileFieldName:"fileToUpload",data:[],headers:{},xhrFields:{},urlPropertyName:"file",statusPropertyName:"success",success:void 0,error:void 0};a(),r.extend(!0,r.trumbowyg,{langs:{en:{upload:"Upload",file:"File",uploadError:"Error"},sk:{upload:"Nahrať",file:"Súbor",uploadError:"Chyba"},fr:{upload:"Envoi",file:"Fichier",uploadError:"Erreur"},cs:{upload:"Nahrát obrázek",file:"Soubor",uploadError:"Chyba"},zh_cn:{upload:"上传",file:"文件",uploadError:"错误"},zh_tw:{upload:"上傳",file:"文件",uploadError:"錯誤"},ru:{upload:"Загрузка",file:"Файл",uploadError:"Ошибка"},ja:{upload:"アップロード",file:"ファイル",uploadError:"エラー"},pt_br:{upload:"Enviar do local",file:"Arquivo",uploadError:"Erro"}},plugins:{upload:{init:function(a){a.o.plugins.upload=r.extend(!0,{},o,a.o.plugins.upload||{});var l={fn:function(){a.saveRange();var o,l=a.o.prefix,t=a.openModalInsert(a.lang.upload,{file:{type:"file",required:!0,attributes:{accept:"image/*"}},alt:{label:"description",value:a.getRangeText()}},function(u){var p=new FormData;p.append(a.o.plugins.upload.fileFieldName,o),a.o.plugins.upload.data.map(function(r){p.append(r.name,r.value)}),r.map(u,function(r,e){"file"!==e&&p.append(e,r)}),0===r("."+l+"progress",t).length&&r("."+l+"modal-title",t).after(r("<div/>",{"class":l+"progress"}).append(r("<div/>",{"class":l+"progress-bar"}))),r.ajax({url:a.o.plugins.upload.serverPath,headers:a.o.plugins.upload.headers,xhrFields:a.o.plugins.upload.xhrFields,type:"POST",data:p,cache:!1,dataType:"json",processData:!1,contentType:!1,progressUpload:function(e){r("."+l+"progress-bar").css("width",Math.round(100*e.loaded/e.total)+"%")},success:function(o){if(a.o.plugins.upload.success)a.o.plugins.upload.success(o,a,t,u);else if(e(o,a.o.plugins.upload.statusPropertyName.split("."))){var l=e(o,a.o.plugins.upload.urlPropertyName.split("."));a.execCmd("insertImage",l),r('img[src="'+l+'"]:not([alt])',a.$box).attr("alt",u.alt),setTimeout(function(){a.closeModal()},250),a.$c.trigger("tbwuploadsuccess",[a,o,l])}else a.addErrorOnModalField(r("input[type=file]",t),a.lang[o.message]),a.$c.trigger("tbwuploaderror",[a,o])},error:a.o.plugins.upload.error||function(){a.addErrorOnModalField(r("input[type=file]",t),a.lang.uploadError),a.$c.trigger("tbwuploaderror",[a])}})});r("input[type=file]").on("change",function(r){try{o=r.target.files[0]}catch(e){o=r.target.value}})}};a.addBtnDef("upload",l)}}}})}(jQuery);
            }
        },

        mounted: function () {
            this.loadTrumb();
            let token = document.head.querySelector('meta[name="csrf-token"]');

            $('#trumbowyg').trumbowyg({
                resetCss: true,
                btnsDef: {
                    // Create a new dropdown
                    image: {
                        dropdown: ['insertImage', 'upload'],
                        ico: 'insertImage'
                    }
                },
                // Redefine the button pane
                btns: [
                    ['viewHTML'],
                    ['undo', 'redo'],
                    ['formatting'],
                    ['link'],
                    ['image'], // Our fresh created dropdown
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ],
                plugins: {
                    upload: {
                        serverPath: '/blog/upload',
                        fileFieldName: 'file',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token.content,
                        },
                        urlPropertyName: 'url'
                    }
                }
            });
        }
    }
</script>
