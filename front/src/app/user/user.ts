import { Address } from '../address/address';
import { UserData } from './user-data/user-data';

export class User {
    constructor(
        public cpf: number = null,
        public name: string = "",
        public email: string = "",
        public password: string = "",
        public phone: string = "",
        public date_birth: string = "",
        public address: Address = new Address(),
        public data: UserData = new UserData()
    ) {

    }
}
