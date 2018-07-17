import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HttpClientModule } from '@angular/common/http';
import { MaterialModule } from './material/material.module';
import { FlexLayoutModule } from '@angular/flex-layout';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { NgxMaskModule } from 'ngx-mask';

import { AppComponent } from './app.component';
import { AppRoutesModule } from './routing/app.routing.module';
import { MenuSidenavComponent } from './components/menu-sidenav/menu-sidenav.component';
import { ClientRegistrationComponent } from './components/client-registration/client-registration.component';
import { ClientService } from './services/client.service';
import { ProfessionalDataService } from './services/professional-data.service';

@NgModule({
  declarations: [
    AppComponent,
    MenuSidenavComponent,
    ClientRegistrationComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutesModule,
    BrowserAnimationsModule,
    ReactiveFormsModule,
    FormsModule,
    HttpClientModule,
    FlexLayoutModule,
    MaterialModule,
    NgxMaskModule.forRoot()
  ],
  providers: [
    ClientService,
    ProfessionalDataService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
