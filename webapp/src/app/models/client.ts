import { Address, Phone, ProfessionalData } from './index';

export class Client {
    cpf: string;
    name: string;
    email: string;
    birthdate: Date|string;
    password: string;
    address: Address;
    phones: Phone[];
    professional_data: ProfessionalData;
}
