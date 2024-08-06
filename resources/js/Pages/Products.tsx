import { Head } from '@inertiajs/react'
import { PageProps } from '@/types'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import ProductsTable from '@/Components/ProductsTable'

export default function Products({ auth, products }: PageProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-2xl font-black">Inventory</h2>}
        >
            <Head title="Products" />

            <div className="flex flex-col gap-4 overflow-y-scroll scroll-smooth py-4">
                <div className="grid gap-4 px-8 xl:grid-cols-4">
                    <div className="col-span-4 grid w-full grid-flow-row auto-rows-max gap-4">
                        <ProductsTable user={auth.user} products={products} />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}
