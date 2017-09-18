import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';
import { HttpModule } from '@angular/http';
import { NgModule } from '@angular/core';
import { FormsModule } from "@angular/forms";

import { AppHttpService } from "./app-http.service";
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
        HttpModule,
        FormsModule,
        RestaurantModule,
        RouterModule.forRoot( appRoutes )
    ],
    providers: [ AppHttpService ],
    bootstrap: [ AppComponent ]
} )
export class AppModule {
}
