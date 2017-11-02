export class Address {
    constructor(
        public cep: number = null,
        public street: string = "",
        public number: number = null,
        public address2: string = "",
        public neighbor: string = "",
        public city: string = "",
        public state: string = ""
    ) {

    }
}
