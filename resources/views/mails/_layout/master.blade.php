<!DOCTYPE html>
<!-- Set the language of your main document. This helps screenreaders use the proper language profile, pronunciation, and accent. -->
<html lang="en">
  @include('mails._layout._partials.head')
  <body style="margin: 0 !important; padding: 0 !important;">
    <!-- This ghost table is used to constrain the width in Outlook. The role attribute is set to presentation to prevent it from being read by screenreaders. -->
    <!--[if (gte mso 9)|(IE)]>
    <table cellspacing="0" cellpadding="0" border="0" width="720" align="center" role="presentation"><tr><td>
    <![endif]-->
    <!-- The role and aria-label attributes are added to wrap the email content as an article for screen readers. Some of them will read out the aria-label as the title of the document, so use something like "An email from Your Brand Name" to make it recognizable. -->
    <!-- Default styling of text is applied to the wrapper div. Be sure to use text that is large enough and has a high contrast with the background color for people with visual impairments. -->
    <div role="article" lang="nl" style="background-color: white; color: #353A3E; font-family: 'Noto', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 14px; font-weight: 400; line-height: 28px; margin: 0 auto; max-width: 720px; padding: 40px 20px 40px 20px;">

        <!-- Logo section and header. Headers are useful landmark elements. -->
        <header>
            <!-- Since this is a purely decorative image, we can leave the alternative text blank. -->
            <!-- Linking images also helps with Gmail displaying download links next to them. -->
            @php $url = env('APP_URL') @endphp
            <a href="{{ $url }}">
                <img src="{{ url('assets/front/img/logo.svg') }}" alt="" height="50" width="50">
            </a>
            <!-- The h1 is the main heading of the document and should come first. -->
            <!-- We can override the default styles inline. -->
            <h1 style="font-family: 'Kreon'; font-size: 24px; font-weight: 700; line-height: 32px; margin: 36px 0;">
               @yield('title')
            </h1>
        </header>

        <!-- Main content section. Main is a useful landmark element. -->
        <main style="border-left:1px solid #ECF0F3; padding: 0 0 0 20px">
            <!-- Intro copy -->
            <p class="intro" style="font-family: 'Kreon'; font-size: 16px;  line-height: 24px;">
                @yield('intro')
            </p>

            <!-- Body copy -->
            <p class="color: #353A3E;">
                @yield('content')
            </p>

            <!-- This link uses descriptive text to inform the user what will happen with the link is tapped. -->
            <!-- It also uses inline styles since some email clients won't render embedded styles from the head. -->

            <a href="{{ $url }}" style="display: inline-block; mso-hide:all; background-color: #3F2FDC; color: #FFFFFF; border:1px solid #3F2FDC; border-radius: 6px; line-height: 220%; width: 200px; font-family: 'Noto', sans-serif; font-size:16px; text-align: center; text-decoration: none; -webkit-text-size-adjust:none;" target="_blank">@yield('knop_tekst')</a>
        </a>

            <p color: #353A3E;>
                Groetjes,<br>
                [[ insert name manager ]]
            </p>
        </main>

        <!-- Footer information. Footer is a useful landmark element. -->
        <footer>
            <!-- This link uses descriptive text to inform the user what will happen with the link is tapped. -->
            <!-- It also uses inline styles since some email clients won't render embedded styles from the head. -->
            <p style="font-size: 14px; font-style: italic; font-weight: 400; line-height: 24px; margin-top: 48px;">
                Je ontvangt deze e-mail omdat jouw manager jouw e-mail heeft opgegeven en zo graag wil weten welke karakterrollen je hebt.
            </p>

            <!-- The address element does exactly what it says. By default, it is block-level and italicizes text. You can override this behavior inline. -->
            <div style="font-size: 12px; font-style: normal; font-weight: 400; line-height: 24px;">
                &copy;{{ date('Y')}}  &bull; {{ $url }}
            </div>
        </footer>

    </div>
    <!--[if (gte mso 9)|(IE)]>
    </td></tr></table>
    <![endif]-->
  </body>
</html>
