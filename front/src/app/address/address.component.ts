import { Component, OnInit, Input } from '@angular/core';
import { Address } from './address';
import { AddressService } from './address.service';

@Component({
    selector: 'app-address',
    templateUrl: './address.component.html',
    styleUrls: ['./address.component.css']
})
export class AddressComponent implements OnInit {
    @Input() user;

    constructor(
      private _addressService: AddressService
    ) { }

    ngOnInit() { }
  
    getAddressFromCEP(address: Address)
    {
        let cep = address.cep;
        if(cep != null && cep.toString().length < 8) {
            return false;
        }

        this._addressService.getAddressFromCEP(cep)
        .then(response => this.user.address = response)
        .catch(err => console.log(err));
    }
}
