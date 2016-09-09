

    <div class="col-md-9" ng-controller="GalleryCreateController">
        <form  name="galleryUploadForm" ng-submit="save()" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?= csrf_token() ?>">

            <div class="row">
                <div class="form-group col-md-offset-2 col-md-8">
                    <input
                     type="text"
                     placeholder="Nosaukums"
                     name="name"
                     id="name"
                     ng-model="name"
                     class="form-control">
                </div>
            </div>

            <div class="row">


                <div class="col-md-12" >
                    <div class="col-md-3 clear-pads gallery-img-preview" ng-repeat="image in files">
                        <div class="close-icon-wrap" ng-click="deleteImage(image)">
                            <img class="" ng-src="/images/icons/close.png">
                        </div>
                         <img class="" ngf-src="image">

                    </div>
                </div>

            </div>

            <div ngf-drop ngf-select ng-model="files" class="drop-box"
                  ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
                  accept="image/*" ng-hide="uploaded"
                  ngf-pattern="'image/*'">Klikšķini vai nomet attēlus šeit.</div>

            <div class="right">
                <button ng-hide="uploaded" class="gallery-upload-button btn btn-primary" type="submit">Saglabāt</button>
                <button ng-show="uploaded" class="back btn btn-info" >Atpakaļ</button>
            </div>

        </form>


    </div>