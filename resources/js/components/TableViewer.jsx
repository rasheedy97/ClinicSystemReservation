import React from "react";
import { useTable,useFilters } from "react-table";
import { Table } from "reactstrap";
import { Filter,DefaultColumnFilter } from "./filters";



const TableViewer = ({ columns, data }) => {
    
    const { getTableProps, getTableBodyProps, headerGroups, rows, prepareRow } =
        useTable({
            columns,
            data,
            defaultColumn:{Filter:DefaultColumnFilter}
        } ,
        useFilters
        );
       
    // Handle Empty Data
    if (data.length == 0) {
        return (
            <div>
                <b>No Appointments</b>
            </div>
        );
    }
    return (
        <Table bordered hover {...getTableProps()}>
            <thead>
                {headerGroups.map((headerGroup) => (
                    <tr {...headerGroup.getHeaderGroupProps()}>
                        {headerGroup.headers.map((column) => (
                            <th {...column.getHeaderProps()}>
                                <div>
                                {column.render("Header")}
                                </div>
                               <Filter column={column} />
                            </th>
                           
                        ))}
                    </tr>
                ))}
            </thead>

            <tbody {...getTableBodyProps()}>
                {rows.map((row) => {
                    prepareRow(row);
                    return (
                        <tr {...row.getRowProps()}>
                            {row.cells.map((cell) => {
                                return (
                                    <td {...cell.getCellProps()}>
                                        {cell.render("Cell")}
                                    </td>
                                );
                            })}
                        </tr>
                    );
                })}
            </tbody>
        </Table>
    );
};

export default TableViewer;
