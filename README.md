# MantisTools

Minimum Mantis version: 2.10.0

#### Current features
- Removes some options (trivial, text, tweak, crash, block)  of the "severity"-setting for more clarity and adds two new options, which combine the missing options

#### Configuration steps in your Mantis installation
- Copy "custom_constants_inc" to */yourMantisDirectory/config*
- Copy "config_inc.example.php" to */yourMantisDirectory/config*, edit this file with your database connection data and rename it to "config_inc.php" (replace the file if it already exists)
- Copy "strings_german.txt" and replace it with the same-named existing file in */yourMantisDirectory/lang*
- Recommended: After finishing the previous steps, copy "severity_enum_string_mapping.php" to */yourMantisDirectory/config* and run the script once. The script will map bugs with a removed "severity" option to the corresponding new "severity" option. If you do not run the script and there are bugs with missing "severity" options, a number will be shown instead.
