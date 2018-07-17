import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MenuSidenavComponent } from '../components/menu-sidenav/menu-sidenav.component';
import { ClientRegistrationComponent } from '../components/client-registration/client-registration.component';

const appRoutes: Routes = [
    {
      path: '', component: MenuSidenavComponent,
      children: [
        {
          path: 'client/new',
          component: ClientRegistrationComponent
        }
      ]
    }
  ];

  @NgModule({
    imports: [
      RouterModule.forRoot(
        appRoutes,
      //  { enableTracing: true } // <-- debugging purposes only
      )
    ],
    exports: [
      RouterModule
    ]
  })
  export class AppRoutesModule {}
