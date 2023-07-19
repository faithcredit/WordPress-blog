const { registerBlockType } = wp.blocks;
 
registerBlockType( 'pdev/hello-world', {
    title:    'Hello world!',
    icon:     'admin-site-alt2',
    category: 'common',
 
    edit() {
        return <pre>Hello world!</pre>;
    },
 
    save() {
        return <pre>Hello world!</pre>;
    }
} );