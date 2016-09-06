<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sendMessage">
    Vēstule
</button>
<!--<button type="button" class="btn btn-primary btn-sm" ng-click="ngMessage()">
    Vēstule ar ngDialog
</button>-->

<!-- Modal -->
<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="sendMessageLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control" placeholder="Sper vaļā..." rows="3" ng-model="messageBody" ng-change="checkMessageBody()"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Aizvērt</button>
                <button type="button" ng-disabled="disabled" class="btn btn-primary" data-dismiss="modal" ng-click="sendMessage()">Sūtīt</button>
            </div>
        </div>
    </div>
</div>