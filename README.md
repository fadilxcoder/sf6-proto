# Notes

- Comparing 2 images to check matching (https://github.com/fadilxcoder/face-recognition.git)

```bash
λ php bin/console app:image:recognition


 [OK] {"faces": 1, "match": true, "coordinates": [662, 118, 439, 341]}

```

- OCR - Reading text from image (https://github.com/fadilxcoder/ocr-image-to-text.git)

```bash
λ php bin/console app:image:text

 ! [NOTE] JAMES SMITH
 !        SALES MANAGER
 !
 !        & 123123 123
 !
 !        = jamessmith@spc.com
 !
 !        yww.spc.com

 ! [NOTE] n<2>9-| Uxbridge
 !        University
 !        London
 !
 !        | STUDENT CARD
 !        | Expires 05/09/2023
 !
 !        |IDNumber 2001827384
 !
 !        Christopher Jones DOB: 10/09/1995
 !        BA Honours Business Management

 ! [NOTE] Lorem Ipsum is simply dummy text
 !
 !        Why do we use it?


 [OK] OCR successfully terminated.

```

## GraphQL

- `php bin/console doctrine:database:create`
- `symfony console doctrine:schema:update --force`
- `php bin/console doctrine:fixtures:load`
- GraphQL query UI : http://sf6.inbuilt.app.local/graphiql

### Notes

- **Develop a GraphQL-Powered API With Symfony**  - https://www.twilio.com/blog/develop-graphql-powered-api-with-symfony
- Source code : https://github.com/yemiwebby/twilio-graphql-demo
- PDF : <a href="./_docs/graphql.pdf" target="_blank">Build GraphQL API</a>
- Truncate table with FK

```sql
SET FOREIGN_KEY_CHECKS = 0; 
TRUNCATE table author;
SET FOREIGN_KEY_CHECKS = 1;
```

```bash
$ php bin/console debug:router
 ------------------------------------------ -------- -------- ------ -----------------------------------
  Name                                       Method   Scheme   Host   Path
 ------------------------------------------ -------- -------- ------ -----------------------------------
  overblog_graphiql_endpoint                 ANY      ANY      ANY    /graphiql
  overblog_graphiql_endpoint_multiple        ANY      ANY      ANY    /graphiql/{schemaName}
  _preview_error                             ANY      ANY      ANY    /_error/{code}.{_format}
  overblog_graphql_endpoint                  ANY      ANY      ANY    /api/
  overblog_graphql_batch_endpoint            ANY      ANY      ANY    /api/batch
  overblog_graphql_multiple_endpoint         ANY      ANY      ANY    /api/graphql/{schemaName}
  overblog_graphql_batch_multiple_endpoint   ANY      ANY      ANY    /api/graphql/{schemaName}/batch
  _wdt                                       ANY      ANY      ANY    /_wdt/{token}
  _profiler_home                             ANY      ANY      ANY    /_profiler/
  _profiler_search                           ANY      ANY      ANY    /_profiler/search
  _profiler_search_bar                       ANY      ANY      ANY    /_profiler/search_bar
  _profiler_phpinfo                          ANY      ANY      ANY    /_profiler/phpinfo
  _profiler_xdebug                           ANY      ANY      ANY    /_profiler/xdebug
  _profiler_search_results                   ANY      ANY      ANY    /_profiler/{token}/search/results
  _profiler_open_file                        ANY      ANY      ANY    /_profiler/open
  _profiler                                  ANY      ANY      ANY    /_profiler/{token}
  _profiler_router                           ANY      ANY      ANY    /_profiler/{token}/router
  _profiler_exception                        ANY      ANY      ANY    /_profiler/{token}/exception
  _profiler_exception_css                    ANY      ANY      ANY    /_profiler/{token}/exception.css
  app                                        ANY      ANY      ANY    /
 ------------------------------------------ -------- -------- ------ -----------------------------------

```