module.exports = {
  title: 'Path Tools Plugin Documentation',
  description: 'Documentation for the Path Tools plugin',
  base: '/docs/path-tools/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    repo: 'nystudio107/craft-pathtools',
    docsDir: 'docs/docs',
    docsBranch: 'develop',
    algolia: {
      appId: '36DLY52ODU',
      apiKey: 'c4223fa9aeaf7155816dccb84e5f87a8',
      indexName: 'nystudio107-path-tools'
    },
    editLinks: true,
    editLinkText: 'Edit this page on GitHub',
    lastUpdated: 'Last Updated',
    sidebar: 'auto',
  },
};
