import { Injectable } from '@angular/core';
import toastr from 'toastr';


@Injectable()
export class ToastService {

  constructor() { 

    

  }

  showToast(type:string, tittle : string , message : string) {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr[type](message,tittle)
  }
  showSuccess( tittle : string = 'Sucesso', message : string ) {
    this.showToast('success', tittle, message)
  }
  showError( tittle : string = 'Erro', message : string ) {
    this.showToast('error', tittle, message)
  }



}
