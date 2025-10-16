@REM to not print commands.
@ECHO OFF

@REM %~dp0: folder path of the current batch file.
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/vendor/bin/generate-excludes
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0/vendor/bin

SET IOHNA_PROJECT=WC

%PHP74% "%BIN_TARGET%" %*