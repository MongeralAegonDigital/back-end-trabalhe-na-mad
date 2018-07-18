import { NgModule } from '@angular/core';
import {
  MatToolbarModule,
  MatSidenavModule,
  MatFormFieldModule,
  MatMenuModule,
  MatButtonModule,
  MatIconModule,
  MatCardModule ,
  MatListModule,
  MatTableModule,
  MatInputModule,
  MatTooltipModule,
  MatDatepickerModule,
  MatNativeDateModule,
  MatSelectModule,
  MatAutocompleteModule,
  MatStepperModule,
  MAT_DATE_FORMATS,
  MAT_DATE_LOCALE
} from '@angular/material';


@NgModule({
  imports: [
    MatToolbarModule,
    MatSidenavModule,
    MatFormFieldModule,
    MatMenuModule,
    MatButtonModule,
    MatTooltipModule,
    MatIconModule,
    MatCardModule,
    MatListModule,
    MatTableModule,
    MatInputModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatSelectModule,
    MatAutocompleteModule,
    MatStepperModule
  ],
  exports: [
    MatToolbarModule,
    MatSidenavModule,
    MatFormFieldModule,
    MatMenuModule,
    MatButtonModule,
    MatIconModule,
    MatCardModule,
    MatListModule,
    MatTableModule,
    MatInputModule,
    MatTooltipModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatSelectModule,
    MatAutocompleteModule,
    MatStepperModule
  ],
  providers: [
    {provide: MAT_DATE_LOCALE, useValue: 'pt-BR'}
  ],
})
export class MaterialModule { }
