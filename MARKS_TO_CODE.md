# From marks to code

1. Which file is the marking model, and why are the marks not written
   inside the model file?

The marking model is `app/PIM/beneficiary.marks.json`, and the second situation uses
`app/PIM/beneficiary.marksB.json`. The marks
hold platform choices such as the table name `dxcloud_beneficiaries`, the column length 80, and
the unique key on `fullName`. Those belong to CodeIgniter4, not to the Beneficiary concept, so
writing them inside `app/PIM/beneficiary.json` would make the model platform dependent. The
model stays clean and the marks sit beside it in their own file.

2. Which mark selected a rule, and which marks provided a value?
   Name the mark and where it goes.

The `unique` mark is the rule selection mark; it goes on a field (`fullName` in the first file,
`registeredAt` in the second) and chooses the unique key rule, which writes an `addUniqueKey`
line in the migration and `UNIQUE` in the SQL. The `tableName` mark goes on the entity
`Beneficiary` and provides the table name value. The `size` mark goes on the text field
`fullName` and provides the column length value.

3. Trace table.

| Mark | Target | Value | Where it shows in the generated code |
|------|--------|-------|--------------------------------------|
| tableName | Beneficiary | "dxcloud_beneficiaries" | the migration `2026-10-18-045528_CreateBeneficiaryTable.php`, the `createTable('dxcloud_beneficiaries')` line; also `BeneficiaryModel.php`, the `$table` line |
| unique | fullName | true | the migration, the `addUniqueKey('full_name')` line; also `writable/generated/dxcloud_beneficiaries.sql`, the `full_name ... UNIQUE` line |
| size | fullName | 80 | the migration, the `full_name` line with `'constraint' => 80`; also `writable/generated/dxcloud_beneficiaries.sql`, `full_name VARCHAR(80)` |

4. The model file did not change between the first and second marking
   files. What changed in the output?

The columns stayed identical because they come from `app/PIM/beneficiary.json`. What changed
all comes from the marks: the table name became `beneficiary_dedup_list` instead of
`dxcloud_beneficiaries`, the `full_name` length became 120 instead of 80, and the `UNIQUE`
marker moved from the `full_name` column to the `registered_at` column.

5. Which marks in Part 3 of your Marking Models Documentation match the
   marks in your marking file? If any are different, say why.

Our design documentation is the Week 6 submission in `docs/week-6-documentation.md`, whose
Part 3 records the Beneficiary Information Data Store as the component being documented. The
`unique` mark on `fullName` matches that entry directly, because it states that accurate
beneficiary information is necessary for preventing duplicate records. The `tableName` mark
(`dxcloud_beneficiaries`) and the `size` mark (80 on `fullName`) are not written in the
documentation because they are platform choices for that same data store, and Part 3 of the
activity keeps those outside the model. No mark contradicts the documentation.
