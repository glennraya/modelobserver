import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow
} from '@/Components/ui/table'
import { useToast } from '@/Components/ui/use-toast'

import {
    Card,
    CardDescription,
    CardContent,
    CardHeader,
    CardTitle
} from '@/Components/ui/card'
import { Button } from '@/Components/ui/button'
import { PiDatabaseDuotone, PiTrashDuotone } from 'react-icons/pi'
import { User, Products } from '@/types'
import { router } from '@inertiajs/react'

const ProductsTable = ({
    user,
    products
}: {
    user: User
    products: Products
}) => {
    const { toast } = useToast()

    // Truncate long description text.
    const truncateText = (text: string, maxLength: number) => {
        if (text.length > maxLength) {
            return text.substring(0, maxLength) + '...'
        }
        return text
    }

    // Delete a product.
    const deleteProduct = (id: number, name: string) => {
        router.delete(route('products.destroy', id), {
            preserveScroll: true,
            onSuccess: response => {
                toast({
                    title: 'Delete Product',
                    description: `${name} has been successfully deleted.`
                })
            },
            onError: () => {
                toast({
                    title: 'Delete Product',
                    variant: 'destructive',
                    description: `${name} has been successfully deleted.`
                })
            }
        })
    }

    return (
        <Card className="relative h-fit w-full overflow-hidden">
            <CardHeader>
                <CardTitle className="flex items-center justify-between text-2xl font-bold">
                    <span>Products</span>
                    <span>
                        <PiDatabaseDuotone className="size-7" />
                    </span>
                </CardTitle>
                <CardDescription>
                    List of all products in the inventory.
                </CardDescription>
            </CardHeader>
            <CardContent className="relative">
                <Table className="mb-4 h-full">
                    <TableHeader>
                        <TableRow>
                            <TableHead>Name</TableHead>
                            <TableHead>Quantity</TableHead>
                            <TableHead>Unit Price</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead className="hidden text-right sm:table-cell">
                                &nbsp;
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        {products.data.map(product => (
                            <TableRow key={product.id}>
                                <TableCell className="font-bold">
                                    {product.name}
                                </TableCell>
                                <TableCell>{product.quantity}</TableCell>
                                <TableCell>${product.price}</TableCell>
                                <TableCell className="truncate">
                                    {truncateText(product.description, 60)}
                                </TableCell>

                                <TableCell>
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        title="Delete product"
                                        onClick={() =>
                                            deleteProduct(
                                                product.id,
                                                product.name
                                            )
                                        }
                                    >
                                        <PiTrashDuotone className="size-5" />
                                    </Button>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
                <div className="flex justify-center gap-2 xl:justify-end">
                    <Button variant="outline" size="sm" type="button">
                        Prev
                    </Button>
                    <Button variant="outline" size="sm" type="button">
                        Next
                    </Button>
                </div>
            </CardContent>
        </Card>
    )
}

export default ProductsTable
