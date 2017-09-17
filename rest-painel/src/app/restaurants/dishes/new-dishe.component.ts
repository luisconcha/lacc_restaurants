import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import * as jQuery from 'jquery';
import Toast from 'materialize-css';


@Component( {
    selector: 'app-new-dishe',
    templateUrl: './new-dishe.component.html'
} )

export class NewDisheComponent implements OnInit {

    constructor( private router: Router ) {

    }

    ngOnInit() {
        jQuery( '.modal' ).modal(
            { complete: () => this.router.navigate( [ '/dishes' ] ) }
        );
        jQuery( '.modal' ).modal( 'open' );
    }

    //save( e ) {
    //    e.preventDefault();
    //    window.Materialize.toast( 'Salvo com sucesso', 3000 );
    //    console.log( 'Obj: ', e );
    //}
}