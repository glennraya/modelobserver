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
import { PiDatabaseDuotone } from 'react-icons/pi'
import { User } from '@/types'
import axios from 'axios'

const ProductsTable = ({ users, user }: { users: User[]; user: User }) => {
    const { toast } = useToast()

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
                            <TableHead>Member</TableHead>
                            <TableHead className="hidden text-right sm:table-cell">
                                Status
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody></TableBody>
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
