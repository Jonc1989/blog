<div class="col-md-12">
    <div ng-repeat="message in messages.data">
        <div>
            <span ng-bind=" friendId = message.receiver_id ? message.senders.name + ' ' + message.senders.surname : message.receivers.name + ' ' + message.receivers.surname "></span>
            <span ng-bind="message.created_at" class="pull-right"></span>
        </div>
        <div>
            <span ng-bind="message.text"></span>

        </div>
    </div>

    <div class="">
        <textarea class="form-control" placeholder="Sper vaļā..." rows="3" ng-model="messageBody" ng-change="checkMessageBody()"></textarea>
    </div>
    <div class="">
        <button type="button" ng-disabled="disabled" class="btn btn-primary" ng-click="sendMessage()">Sūtīt</button>
    </div>
</div>