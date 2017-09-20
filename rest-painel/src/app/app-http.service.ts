import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { environment } from "../environments/environment";
import 'rxjs/add/operator/toPromise';

@Injectable()

export class AppHttpService {

    protected header: Headers;
    protected url: string;

    constructor( protected http: Http ) {
        this.setAccessToken();
    }

    request() {
        return this.http;
    }

    getUser() {
        return this.builder( 'auth/me' ).list();
    }

    setAccessToken() {

        let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRlY2JiYzJjOTVhMTkwOGRlMGY5OTg0OWRhYzFhNjcwMDllMDRhNTBlZGQ0NmVjOWUzY2IwMDhlYTBlNGUwZTlkZDRjNjVmNmEyNmFmMmU4In0.eyJhdWQiOiIzIiwianRpIjoiNGVjYmJjMmM5NWExOTA4ZGUwZjk5ODQ5ZGFjMWE2NzAwOWUwNGE1MGVkZDQ2ZWM5ZTNjYjAwOGVhMGU0ZTBlOWRkNGM2NWY2YTI2YWYyZTgiLCJpYXQiOjE1MDU3MDY1MjYsIm5iZiI6MTUwNTcwNjUyNiwiZXhwIjoxNTM3MjQyNTI2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.e6v4RDo2bZrJqEjP4uABsXEI9CUPPNL0rtP_OyTTrGS1s2KL9ugF1c2VyOmrIC3GgJA6IJ9-wt5WRQ1FPyLbfGQO1t-mHoXylD6dmrt_I7dFLTL7zCYUDJal47jDgnRvBBcJZ4ggPo238jY6mTcabQ8bh4TyP66oZoIrbC-jnRXuj3CEeY9h81RGPOSo5IrISmkYGc-yGLsVHkldBI2DyVXKLtx1bgkjHPJE1XF362aUA9sYPMIgAD563q2jooKIuWlZ1Zi4a707JW3EWLumS3MIHkwCBg26N1XM5N8nFvMKFEIlHnGv9c00UEbqi0PEwzQMk2-8VStRMSdUv4kitIyqhEPhiWZPTqfYMlVf02wQkG1evQtXJHvP1D0WrIomDJ2_nKqKmtQaG9tmard5a395LT-9dlSjphDOi82vc6mJAlKKjqWK4145F9ekgNovCpP1_TWetL0fYETFejC65KsFkeaFozc_0wcnM7U1ldcUBqIzlvzKKVYxTSiq4XdPDqzM0T0pYf8JwQlFZ60ghJUFS5OLBv7JfeI3Z8kxtPTYkWhtyCUS9LTL9zz-WnLygAUdaAYKJXoPKqqy-G0HXDI-KGRnzzEI03834rAcIxJmL-EAX4gwUkoPnJT4sry77_PI_W3SvnOBkbrYlRzLEss1FsHjUJiZB7g62YDpASA';

        this.header = new Headers( { 'Authorization': 'Bearer ' + token } );
    }

    builder( resource: string ) {
        this.url = environment.server_url + '/api/v1/' + resource;

        return this;
    }

    list( options: Object = {} ) {
        return this.http.get( this.url, { headers: this.header } )
            .toPromise()
            .then( ( res ) => {
                return res.json() || {};
            } );
    }

    view( id: number ) {
        return this.http.get( this.url + '/' + id, { headers: this.header } )
            .toPromise()
            .then( ( res ) => {
                return res.json() || {};
            } );
    }

    update( id: number, data: object ) {
        return this.http.put( this.url + '/' + id, data, { headers: this.header } )
            .toPromise()
            .then( ( res ) => {
                return res.json() || {};
            } );
    }

    insert( data: object ) {
        return this.http.post( this.url, data, { headers: this.header } )
            .toPromise()
            .then( ( res ) => {
                return res.json() || {};
            } );
    }
}