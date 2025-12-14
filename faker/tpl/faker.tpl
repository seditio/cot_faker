<!-- BEGIN: MAIN -->
<div class="row">
  <div class="col-12">
    {FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}
    <div class="block">
      <h2>{PHP.R.icon-plug}{PHP.L.info_name}</h2>
      <div class="wrapper">

        <!-- BEGIN: FORM -->
        <div class="row">

          <div class="col-12 col-xl-6 col-xxl-4">
            <form action="{FAKER_PAGES_ACTION}" method="post" role="form" class="">
              <h3 class="fs-4 mb-2">{PHP.L.Pages}</h3>
              <table class="table table-striped">
                <tr>
                  <td class="w-25">{PHP.L.faker_pages_amount}:</td>
                  <td class="w-75">{FAKER_PAGES_AMOUNT}</td>
                </tr>
                <tr>
                  <td>{PHP.L.faker_pages_max_title}:</td>
                  <td>{FAKER_PAGES_MAX_TITLE}</td>
                </tr>
                <tr>
                  <td>{PHP.L.faker_pages_max_desc}:</td>
                  <td>{FAKER_PAGES_MAX_DESC}</td>
                </tr>
                <tr>
                  <td>{PHP.L.faker_pages_max_text}:</td>
                  <td>{FAKER_PAGES_MAX_TEXT}</td>
                </tr>
                <tr>
                  <td>{PHP.L.faker_pages_category}:</td>
                  <td>{FAKER_PAGES_CAT}</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>
                    <button type="submit" class="btn btn-primary">{PHP.L.faker_generate}</button>
                  </td>
                </tr>
              </table>
            </form>
          </div>

          <div class="col-12 col-xl-6 col-xxl-4">
            <form action="{FAKER_USERS_ACTION}" method="post" role="form" class="">
              <h3 class="fs-4 mb-2">{PHP.L.Users}</h3>
              <table class="table table-striped">
                <tr>
                  <td class="w-25">{PHP.L.faker_users_amount}:</td>
                  <td class="w-75">{FAKER_USERS_AMOUNT}</td>
                </tr>
                <tr>
                  <td>{PHP.L.faker_users_group}:</td>
                  <td>{FAKER_USERS_GROUP}</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>
                    <button type="submit" class="btn btn-primary">{PHP.L.faker_generate}</button>
                  </td>
                </tr>
              </table>
            </form>
          </div>

          <div class="col-12 col-xl-6 col-xxl-4">
            <form action="{FAKER_COMMENTS_ACTION}" method="post" role="form" class="">
              <h3 class="fs-4 mb-2">{PHP.L.comments_title}</h3>
              <table class="table table-striped">
                <tr>
                  <td class="w-25">{PHP.L.faker_comments_amount}:</td>
                  <td class="w-75">{FAKER_COMMENTS_AMOUNT}</td>
                </tr>
                <tr>
                  <td>{PHP.L.faker_comments_max_text}:</td>
                  <td>{FAKER_COMMENTS_MAX_TEXT}</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>
                    <button type="submit" class="btn btn-primary">{PHP.L.faker_generate}</button>
                  </td>
                </tr>
              </table>
            </form>
          </div>

        </div>
        <!-- END: FORM -->

      </div>
    </div>
  </div>
</div>
<!-- END: MAIN -->
