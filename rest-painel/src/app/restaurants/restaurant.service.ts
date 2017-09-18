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
}