import { Injectable } from '@angular/core';
import { Headers } from '@angular/http';
import 'rxjs/add/operator/toPromise';
import { AppHttpService } from "../app-http.service";

@Injectable()

export class RestaurantService extends AppHttpService {

    protected header: Headers;
    protected url: string;
    protected url_cep = "https://viacep.com.br/ws/";


    builder( resource: string = '' ) {
        return super.builder( 'restaurants' + resource );
    }

    getCep( cep: number ) {
        let url = this.url_cep + cep + '/json';

        return this.request().get( url )
            .toPromise()
            .then( ( res ) => {
                return res.json() || {};
            } );
    }

    upload( url: string, data: object ) {
        return this.http.post( this.url + '/' + url, data, { headers: this.header } )
            .toPromise()
            .then( ( res ) => {
                return res.json() || {};
            } );
    }

    //viewImg( url: string ) {
    //    return this.http.get(  'http://localhost:8000/api/v1/restaurants/photo/1/' + url, { headers: this.header } )
    //        .toPromise()
    //        .then( ( res ) => {
    //            return res.json() || {};
    //        } );
    //}
}