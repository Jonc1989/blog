<div class="col-md-12">
    <div id="messages-wrap">
        <div ng-repeat="message in messages"
             scroll
             id="msg_{{message.id}}"
             parent="messages-wrap"
             message="message"
             auth-id="<?= \Auth::id() ?>"
             ng-class="{'unreaded': message.readed == 0 && <?= \Auth::id() ?> !=  message.sender_id}">

            <div class="col-md-12">
                <span ng-bind="message.senders.name + ' ' + message.senders.surname" ng-class="{ 'pull-right': friendId==message.receiver_id }"></span>
            </div>
            <div class="col-md-12">
                <span ng-bind="message.created_at" ng-class="{ 'pull-right': friendId==message.receiver_id }"></span>
            </div>
            <div ng-if="<?= \Auth::id() ?> == message.sender_id && message.readed == 0" class="pull-right">nelasīta</div>
            <div  ng-bind="message.text"></div>
        </div>
    </div>


    <div class="">
        <div ng-show="userSearchOpen">
            <input type="text" class="form-control" ng-model="searchKey" ng-change="search()" ng-blur="hideSearchResults()" ng-focus="showSearchResults()"/>
            <div id="search-results" style="background: whitesmoke;position: absolute;">
                <div ng-repeat="user in searchResults" ng-click="selectUser(user)">
                    <span ng-bind="user.name"></span><span ng-bind="user.surname"></span>
                </div>
            </div>
        </div>






        <textarea class="form-control" placeholder="Sper vaļā..." rows="3" ng-model="messageBody" ng-change="checkMessageBody()"></textarea>
        <?= csrf_field() ?>
    </div>
    <div class="">
        <button type="button" ng-disabled="disabled" class="btn btn-primary" ng-click="sendMessage()">Sūtīt</button>
    </div>
</div>