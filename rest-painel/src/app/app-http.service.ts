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

        let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhiZGRhNzU2YjYxMjU5MWFhYzEwMDVjMWZkMTExNTUyYjMwMTNlMzExN2VlOGUyMThjMzg4Zjc4MmFlMzY1MTJiOGZjMTEyNmUyZDUzYzhkIn0.eyJhdWQiOiIzIiwianRpIjoiOGJkZGE3NTZiNjEyNTkxYWFjMTAwNWMxZmQxMTE1NTJiMzAxM2UzMTE3ZWU4ZTIxOGMzODhmNzgyYWUzNjUxMmI4ZmMxMTI2ZTJkNTNjOGQiLCJpYXQiOjE1MDU2MTg4NjUsIm5iZiI6MTUwNTYxODg2NSwiZXhwIjoxNTM3MTU0ODY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.eC1WAbMceUplxYpfDcrrTtuMMxOfgIposdNZUPQcL1QGcXllYAwXpgWS1f6Ai7L-15O-EpO2LiNAhaA7dbIeSh065o1MYnxWZV4BjApgjVJCclS0zsAVunETrJz47NwvMHcKZDe8DmzEUAJY_9SBmalLna7j_xSCKS8-7J--pMEzd-5e3hYhAypv0Ap03oF4l6d18aHFa2NlK1H73u9J52mTkrQxYdIDQGcJgbYIraMPBQ1G2cf-QwWUMyZilp62PKm236JAbr2XqPzt5IuWGEAcCP2GWWJEToXSA1p-x5feesVPHHaQL0cqreT9Cq7hRFnQCYUPUNATwi809bYXjjcqIvzgTVSWn67jAtz_Bpvp5vFnejSJqcYjCjhiGEUYULIYxim9E-wwPAGNNriy_qW0H-H9afiV9g3IXytHwbkWSQIEe2fsAudADmqK_GsILvSEZ4K1HsF54j9TfCVRVuH1oJ9-CI6aaf9wuyLZu05EMeAzM_7gQUPe_TPttCZZb0FXKjSf8v4oHhWv5hC70uxvG2WmDQ1_omo-4U6AWZeL-m5k7rpWeiAkTa3gxFZytoSH4Sfep_okF78C-dV-MRsfNnYpPeP92ABxRbX3Gg6MmzlA0cbpuU_yl6oWU-3tsU6124IjGcWBe-PssIz8179oWD8O5j71dtughNAMbLE';

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