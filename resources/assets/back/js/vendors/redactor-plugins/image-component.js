$R.add('class', 'image.component', {
    mixins: ['dom', 'component'],
    init: function(app, el)
    {
        this.app = app;
        this.opts = app.opts;
        this.selection = app.selection;

        // init
        return (el && el.cmnt !== undefined) ? el : this._init(el);
    },
    setData: function(data)
    {
        for (var name in data)
        {
            this._set(name, data[name]);
        }
    },
    getData: function()
    {
        var names = ['src', 'title', 'caption', 'align', 'link', 'id'];
        var data = {};

        for (var i = 0; i < names.length; i++)
        {
            data[names[i]] = this._get(names[i]);
        }

        return data;
    },
    getElement: function()
    {
        return this.$element;
    },
    changeImage: function(data)
    {
        this.$element.attr('src', data.url);
    },


    // private
    _init: function(el)
    {
        var $el = $R.dom(el);
        var $figure = $el.closest('figure');

        if (el === undefined)
        {
            this.$element = $R.dom('<img>');
            this.parse('<figure>');
            this.append(this.$element);
        }
        else if ($figure.length === 0)
        {
            this.parse('<figure>');
            this.$element = $el;
            this.$element.wrap(this);
        }
        else
        {
            this.parse($figure);
            this.$element = this.find('img');
        }

        this._initWrapper();
    },
    _set: function(name, value)
    {
        this['_set_' + name](value);
    },
    _get: function(name)
    {
        return this['_get_' + name]();
    },
    _set_src: function(src)
    {
       this.$element.attr('src', src);
    },
    _set_id: function(id)
    {
       this.$element.attr('data-image', id);
    },
    _set_title: function(title)
    {
        title = title.trim().replace(/(<([^>]+)>)/ig,"");

        if (title === '')
        {
            this.$element.removeAttr('alt');
            this.$element.removeAttr('title');
        }
        else
        {
            this.$element.attr('alt', title);
            this.$element.attr('title', title);
        }

    },
    _set_caption: function(caption)
    {
        var $figcaption = this.find('figcaption');
        if ($figcaption.length === 0)
        {
            $figcaption = $R.dom('<figcaption>');
            $figcaption.attr('contenteditable', 'true');

            this.append($figcaption);
        }

        if (caption === '') $figcaption.remove();
        else $figcaption.html(caption);

        return $figcaption;
    },
    _set_align: function(align)
    {
        var imageFloat = '';
        var imageMargin = '';
        var textAlign = '';
        var $el = this;
        var $figcaption = this.find('figcaption');

        if (typeof this.opts.imagePosition === 'object')
        {
            var positions = this.opts.imagePosition;

            for (var key in positions)
            {
                $el.$element.removeClass(positions[key]);
            }

            var alignClass = (typeof positions[align] !== 'undefined') ? positions[align] : false;
            if (alignClass)
            {
                $el.$element.addClass(alignClass);
            }
        }
        else
        {
            switch (align)
            {
                case 'left':
                    imageFloat = 'left';
                    imageMargin = '0 ' + this.opts.imageFloatMargin + ' ' + this.opts.imageFloatMargin + ' 0';
                break;
                case 'right':
                    imageFloat = 'right';
                    imageMargin = '0 0 ' + this.opts.imageFloatMargin + ' ' + this.opts.imageFloatMargin;
                break;
                case 'center':
                    textAlign = 'center';
                break;
            }

            $el.css({ 'float': imageFloat, 'margin': imageMargin, 'text-align': textAlign });
            $el.attr('rel', $el.attr('style'));

            if (align === 'center')
            {
                $figcaption.css('text-align', 'center');
            }
            else
            {
                $figcaption.css('text-align', '');
            }
        }
    },
    _set_link: function(data)
    {
        var $link = this._findLink();
        if (data.url === '')
        {
            if ($link) $link.unwrap();

            return;
        }

        if (!$link)
        {
            $link = $R.dom('<a>');
            this.$element.wrap($link);
        }

        $link.attr('href', data.url);

        if (data.target) $link.attr('target', (data.target === true) ? '_blank' : data.target);
        else $link.removeAttr('target');

        return $link;
    },
    _get_src: function()
    {
        return this.$element.attr('src');
    },
    _get_id: function()
    {
        return this.$element.attr('data-image');
    },
    _get_title: function()
    {
        var alt = this.$element.attr('alt');
        var title = this.$element.attr('title');

        if (alt) return alt;
        else if (title) return title;
        else return '';
    },
    _get_caption: function()
    {
        var $figcaption = this.find('figcaption');

        if ($figcaption.length === 0)
        {
            return '';
        }
        else
        {
            return $figcaption.html();
        }
    },
    _get_align: function()
    {
        var align = '';
        if (typeof this.opts.imagePosition === 'object')
        {
            align = 'none';
            var positions = this.opts.imagePosition;
            for (var key in positions)
            {
                if (this.$element.hasClass(positions[key]))
                {
                    align = key;
                    break;
                }
            }
        }
        else
        {
            align = (this.css('text-align') === 'center') ? 'center' : this.css('float');
        }

        return align;
    },
    _get_link: function()
    {
        var $link = this._findLink();
        if ($link)
        {
            var target = ($link.attr('target')) ? true : false;

            return {
                url: $link.attr('href'),
                target: target
            };
        }
    },
    _initWrapper: function()
    {
        this.addClass('redactor-component');
        this.attr({
            'data-redactor-type': 'image',
            'tabindex': '-1',
            'contenteditable': false
        });
    },
    _findLink: function()
    {
        var $link = this.find('a').filter(function(node)
        {
            return ($R.dom(node).closest('figcaption').length === 0);
        });

        if ($link.length !== 0)
        {
            return $link;
        }

        return false;
    }
});