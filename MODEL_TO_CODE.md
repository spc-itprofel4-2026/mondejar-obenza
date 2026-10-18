# From model to code

1. Which file is the model, and why is it platform independent?

The model is `app/PIM/beneficiary.json`. It lists the Beneficiary concept with six fields
(`fullName`, `address`, `birthDate`, `monthlyIncome`, `isVerified`, `registeredAt`) using plain
types such as `text`, `decimal`, and `yesno`. It names no database word like VARCHAR or INT and
no framework, so the same file can produce CodeIgniter4 code or plain SQL without changing.

2. Which files were generated from it?

Running `php spark model:generate app/PIM/beneficiary.json` wrote the migration
`app/Database/Migrations/2026-10-18-045528_CreateBeneficiaryTable.php` and the model class
`app/Models/BeneficiaryModel.php`. Running the same command with the `sql` target wrote
`writable/generated/beneficiarys.sql`.

3. Which mapping rule turned a text field into a column, and what did it become?

The rule `'text' => ['VARCHAR', 255]` in the `$ci4Types` list of
`app/Commands/ModelGenerate.php` turned the text field `fullName` into the column
`full_name` of type `VARCHAR(255)` with `'null' => false`, because `fullName` is required.
The same field appears in `$sqlTypes` as `VARCHAR(100)`, which the SQL target used for
`full_name` after the rule was changed.

4. What would you change to produce code for a different platform?

I would add another mapping list in `app/Commands/ModelGenerate.php`, like the existing
`$sqlTypes`, holding that platform's type names, and a matching write method that `run()`
calls for the new target. The model file `beneficiary.json` stays exactly the same, so
re-targeting only changes the mapping rules, not the model.
