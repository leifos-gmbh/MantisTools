# MantisTools

#### Current features
- Removes some options (trivial, text, tweak, crash, block)  of the "severity"-setting for more clarity and adds two new options, which combine the missing options

#### Configuration steps in your Mantis installation

1. Copy the lines from "custom_constants_inc.php" from GitHub and add them to the same-named file in */yourMantisDirectory/config*. If the file does not exist, copy the file "custom_constants_inc.php" to */yourMantisDirectory/config*.
2. Copy the lines from "config_inc.php" from GitHub and add them to the same-named file in */yourMantisDirectory/config*.
3. Go to *yourMantisDirectory/lang* and open "strings_german.txt". Search for the variable "$s_severity_enum_string" and comment out this line (for backup reasons). Copy the line from "strings_german.txt" from GitHub and add it below the line which was commented out.
4. Recommended: After finishing the previous steps, copy "map_severity_enum_strings.php", "class.SeverityMapper.php" and "class.DBMySQL.php" to */yourMantisDirectory/config*. Run the script "map_severity_enum_strings.php" once. The script will map bugs with a removed severity option to the corresponding new severity option. If you do not run the script and there are bugs with missing severity options, a number will be shown instead.