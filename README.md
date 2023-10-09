# brucelwayne/wp-dev

![License](https://img.shields.io/badge/License-MIT-blue.svg)

## Introduction

This repository provides a set of tools to streamline local development and testing of WooCommerce with OAuth integration. It hooks into two important actions, `http_api_curl` and `http_request_host_is_external`, making it easier to simulate and manage WooCommerce connections in a local development environment.

## Features

- **Hooked Actions**: This repository hooks into two key WordPress actions:
  - `http_api_curl`: Allows you to intercept and manipulate cURL requests made by WooCommerce, facilitating OAuth-related tasks during development.
  - `http_request_host_is_external`: Provides control over WooCommerce's check for external hosts, making it simpler to test OAuth integrations locally.

## Getting Started

To get started with **brucelwayne/wp-dev**, follow the setup and configuration steps outlined in the project documentation. This will enable you to leverage the hooked actions for a smoother WooCommerce development experience.

## How to Use

1. **Plugin Installation**:
   - Install the **brucelwayne/wp-dev** plugin in your WordPress installation.

2. **Plugin Configuration**:
   - After installing the plugin, navigate to the WordPress admin control panel.
   - Locate the **brucelwayne/wp-dev** settings section.
   - Configure the plugin settings to suit your local development needs.

3. **Using Hooked Actions**:
   - Refer to the project documentation for detailed instructions on how to use the hooked actions for managing WooCommerce OAuth during local development.

**Note**: If you encounter a 404 error when accessing `/wc-auth/v1/authorize` during usage, make sure to set up WordPress Permalinks. This can often resolve the issue.

## Contributing

Contributions to this project are welcome! If you have suggestions, issues, or would like to contribute to enhancing this library, please refer to the contribution guidelines for more information.

## License

This project is licensed under the [MIT License](LICENSE).