import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { UserComponent } from './user/user.component';
import { UserNewComponent } from './user/user-new/user-new.component';
import { UserListComponent } from './user/user-list/user-list.component';
import { AddressComponent } from './address/address.component';
import { UserDataComponent } from './user/user-data/user-data.component';
import { AddressNewComponent } from './address/address-new/address-new.component';
import { UserDataNewComponent } from './user/user-data/user-data-new/user-data-new.component';

import { UserService } from './user/user.service';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    UserComponent,
    UserNewComponent,
    UserListComponent,
    AddressComponent,
    UserDataComponent,
    AddressNewComponent,
    UserDataNewComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule
  ],
  providers: [
    UserService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
