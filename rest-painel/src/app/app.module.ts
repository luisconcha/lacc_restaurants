import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { RestaurantModule } from "./restaurants/restaurant.module";

const appRoutes: Routes = [
    { path: '', redirectTo: '/dashboard', pathMatch: 'full' }
];

@NgModule( {
    declarations: [
        AppComponent
    ],
    imports: [
        BrowserModule,
        RestaurantModule,
        RouterModule.forRoot( appRoutes )
    ],
    providers: [],
    bootstrap: [ AppComponent ]
} )
export class AppModule {
}
