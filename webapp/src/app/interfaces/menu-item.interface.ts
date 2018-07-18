export interface MenuItem {

    title: String;

    url?: String;

    icon?: String;

    opened?: Boolean;

    elements?: {title: String, url: String}[];
}
