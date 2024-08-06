export interface User {
    id: number;
    name: string;
    email: string;
    task_checked_at: string;
    email_verified_at: string;
}

export interface Products {
    current_page: number;
    data: Product[];
    first_page_url: string;
    from: number;
    next_page_url: string|null;
    path: string;
    per_page: number;
    prev_page_url: string|null;
    to: number;
}


export interface Product {
    id: number;
    name: string;
    price: number;
    quantity: number;
    description: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    users: User[];
    products: Products;
};
