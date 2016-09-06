<div class="col-md-12">
    <div id="messages-wrap">
        <div ng-repeat="message in messages.data"  scroll parent="messages-wrap" readed="{{ message.readed }}" ng-class="{unreaded: readed}">
            <div>
                <span ng-bind=" friendId = message.receiver_id ? message.senders.name + ' ' + message.senders.surname : message.receivers.name + ' ' + message.receivers.surname "></span>
                <span ng-bind="message.created_at" class="pull-right"></span>
            </div>
            <div>
                <span ng-bind="message.text"></span>

            </div>
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
    </div>
    <div class="">
        <button type="button" ng-disabled="disabled" class="btn btn-primary" ng-click="sendMessage()">Sūtīt</button>
    </div>
</div>