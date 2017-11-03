import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { UserComponent } from './user/user.component';
import { UserNewComponent } from './user/user-new/user-new.component';
import { UserListComponent } from './user/user-list/user-list.component';
import { AddressComponent } from './address/address.component';
import { UserDataComponent } from './user/user-data/user-data.component';

import { UserService } from './user/user.service';
import { AddressService } from './address/address.service';
import { FormsModule } from '@angular/forms';
import { KeysPipe } from './keys.pipe';

@NgModule({
  declarations: [
    AppComponent,
    UserComponent,
    UserNewComponent,
    UserListComponent,
    AddressComponent,
    UserDataComponent,
    KeysPipe
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule
  ],
  providers: [
    UserService,
    AddressService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
