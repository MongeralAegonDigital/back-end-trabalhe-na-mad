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
    fullAddress = new Address();

    constructor(
      private _addressService: AddressService
    ) { }

    ngOnInit() { }
  
    getAddressFromCEP(address: Address) {
        let cep = address.cep;
        if(cep.toString().length < 8) {
            return false;
        }

        console.log('event', this._addressService.getAddressFromCEP(cep));

        this._addressService.getAddressFromCEP(cep)
        .then(response => this.a(response))
        .catch(err => console.log(err));

        console.log(this.user.address);
    }

    private a(abc)
    {
        console.log(abc);

        this.user.address.street = abc.street;
        this.user.address.neighbor = abc.neighbor;
        this.user.address.city = abc.city;
        this.user.address.state = abc.state;

        console.log('inside', this.user.address);
    }

}
