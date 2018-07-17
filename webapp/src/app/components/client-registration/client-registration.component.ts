import { Component, ViewChild, OnInit, AfterViewInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators, FormControl } from '@angular/forms';
import { ClientService } from '../../services/client.service';
import { MatHorizontalStepper } from '@angular/material';
import { ProfessionalDataService } from '../../services/professional-data.service';

@Component({
  selector: 'app-client-registration',
  templateUrl: './client-registration.component.html',
  styleUrls: ['./client-registration.component.css']
})
export class ClientRegistrationComponent implements OnInit, AfterViewInit {

  personalDataFormGroup: FormGroup;
  addressFormGroup: FormGroup;
  professionalDataFormGroup: FormGroup;

  allWorkcategories = this._professionalDataService.getAllWorkCategories();
  allMaritalStatuses = this._professionalDataService.getAllMaritalStatuses();

  @ViewChild('matHorizontalStepper') private _stepper: MatHorizontalStepper;
  constructor(
    private _formBuilder: FormBuilder,
    private _service: ClientService,
    private _professionalDataService: ProfessionalDataService
  ) { }

  ngOnInit(): void {
    this.personalDataFormGroup = this._formBuilder.group({
      cpf: ['', [Validators.required, Validators.maxLength(11), Validators.minLength(11)]],
      name: ['', [Validators.required, Validators.maxLength(200)]],
      email: ['', [Validators.required, Validators.email]],
      phone: new FormControl({value: '', disable: true}),
      birthdate: new FormControl({value: '', disabled: true}, Validators.required),
      password: ['', Validators.required],
      repeatPassword: ['', Validators.required]
    });

    this.addressFormGroup = this._formBuilder.group({
      cep: ['', Validators.required],
      state: ['', Validators.required],
      city: ['', Validators.required],
      neighborhood: ['', Validators.required],
      street: ['', Validators.required],
      complement: ['', Validators.required],
      number: ['', Validators.required]
    });

    this.professionalDataFormGroup = this._formBuilder.group({
      rg: ['', Validators.required],
      number: ['', Validators.required],
      issuing_agency: ['', Validators.required],
      actual_job: [''],
      profession: ['', Validators.required],
      gross_income: ['', Validators.required],
      marital_status_id: ['', Validators.required],
      work_category_id: ['', Validators.required],
    });
  }

  ngAfterViewInit(): void {
    this.addressFormGroup.controls.cep.valueChanges
      .subscribe(
        valor => {
          if (valor.length === 8) {
            this._service
              .consultarCep(valor)
              .subscribe(address => this._fillAddressForm(address));
          }
        }
      );
  }

  private _fillAddressForm(address): void {
    this.addressFormGroup.patchValue({
      state: address.estado,
      city: address.cidade,
      neighborhood: address.bairro,
      street: address.logradouro,
    });
  }

  public save() {

  }


}

