import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import * as jQuery from 'jquery';
import Toast from 'materialize-css';


@Component( {
    selector: 'app-dashboard',
    templateUrl: './evaluation.component.html'
} )

export class EvaluationComponent implements OnInit {

    constructor( private router: Router ) {

    }

    ngOnInit() {
        jQuery( '.modal' ).modal(
            { complete: () => this.router.navigate( [ '/dashboard' ] ) }
        );
        jQuery( '.modal' ).modal( 'open' );
    }

    save( e ) {
        e.preventDefault();
        window.Materialize.toast( 'Salvo com sucesso', 3000 );
        console.log( 'Obj: ', e );
    }
}