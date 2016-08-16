/**
 * Created by Admin on 16.08.2016..
 */
app.component( 'userInfo', {
    templateUrl: '/api/view/modules.users.api.user-info',
    controller: 'UserController',
    // $routeConfig: [
    //     { path: "/", component: "posts", name: "posts", useAsDefault: true }
    // ],
    bindings: {
        id: '<'
    }
})